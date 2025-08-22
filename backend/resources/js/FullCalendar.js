import { Calendar } from '@fullcalendar/core';
import itLocale from '@fullcalendar/core/locales/it';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';

let startDate = null;
let endDate = null;

export default function FullCalendar() {
    document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendar');
        let calendar = new Calendar(calendarEl, {
            plugins: [ dayGridPlugin, interactionPlugin, ],   // timeGridPlugin, listPlugin 
            initialView: 'dayGridMonth',
            selectable: true,
            locale: itLocale,
            headerToolbar: {
                left: 'prev,next',   // today
                center: 'title',
                right: ''   // 'dayGridMonth,timeGridWeek,listWeek'
            },
            eventContent: function (arg) {
                let price = arg.event.extendedProps.price;
                if (price) {
                return {
                    html: `<div class="price-cell">
                                <div style="display: inline-block">€${price}</div>
                            </div>`,
                };
                }
                return {}; // se non c'è prezzo, non mostra niente
            },
           dateClick: function(info) {
                console.log('info', info);
                let existingEvent = calendar.getEvents().find(ev => {
                    return info.date >= ev.start && info.date < ev.end;
                });

                if (existingEvent) {
                    let groupId = existingEvent.groupId;
                    let action = prompt("Scrivi:\n 1 = Modifica prezzo\n 2 = Cancella selezione");

                    if (action === "2") {
                        deletePrice(calendar, groupId);
                    } else if (action === "1") {
                        editPrice(calendar, groupId);
                    }
                    return;
                }

                addPrice(calendar, info);
            }
        });
        calendar.render();
        setYear(calendar);
    })
}

function addPrice(calendar, info){
    if (!startDate) {
        startDate = info.date;
    } else {
        endDate = info.date;

        let from = startDate < endDate ? startDate : endDate;
        let to = startDate < endDate ? endDate : startDate;

       openModal({
            title : "Inserisci prezzo dal " + from.toLocaleDateString() + " al " + to.toLocaleDateString(),
            onConfirm: (price) => {
                let groupId = "range-" + Date.now();
                let current = new Date(from);

                while (current <= to) {
                    let day = new Date(current);

                    calendar.addEvent({
                        id: "day-" + day.toISOString(),
                        groupId: groupId,
                        start: day,
                        end: new Date(day.getFullYear(), day.getMonth(), day.getDate() + 1),
                        allDay: true,
                        display: "background",
                        classNames: ["selected-days"],
                        extendedProps: { price: price },
                    });

                    current.setDate(current.getDate() + 1);
                }

                startDate = null;
                endDate = null;
            }
        });
    }
}

function editPrice(calendar, groupId){
  let newPrice = prompt("Indicare il nuovo prezzo:");
    if (newPrice) {
        calendar.getEvents().forEach(ev => {
            if (ev.groupId === groupId) {
                ev.setExtendedProp("price", newPrice);
            }
        });
    }
}

function deletePrice(calendar, groupId){
    calendar.getEvents().forEach(ev => {
        if (ev.groupId === groupId) {
            ev.remove();
        }
    });
}


function setYear(calendar){
    const yearSelect = document.getElementById('yearSelect');
    yearSelect.addEventListener('change', function () {
        let selectedYear = parseInt(this.value);

        let currentDate = calendar.getDate();
        let currentMonth = currentDate.getMonth(); 
        let currentDay = currentDate.getDate();

        calendar.gotoDate(new Date(selectedYear, currentMonth, currentDay));
    });
}



function addPriceToCalendar(calendar) {
    const button = document.getElementById('addPrice');
    button.addEventListener('click', function (e) {
        e.preventDefault();
        const startDay = parseInt(document.getElementById('startDay').value);
        const startMonth = parseInt(document.getElementById('startMonth').value);
        const endDay = parseInt(document.getElementById('endDay').value);
        const endMonth = parseInt(document.getElementById('endMonth').value);
        const price = document.getElementById('priceInput').value;

        // Per semplicità, prendiamo l'anno corrente
        const currentYear = new Date().getFullYear();
        let startDate = new Date(currentYear, startMonth, startDay);
        let endDate = new Date(currentYear, endMonth, endDay);

        // aggiungiamo l'evento al calendario
        calendar.addEvent({
            start: startDate,
            end: endDate,
            display: 'background',  // opzione per colore sfondo
            title: `€${price}`,
            backgroundColor: '#7dd3fc',  // azzurro
            borderColor: '#38bdf8',
        });
    });
}


function openModal({ title, defaultValue = "", onConfirm }) {
  const modal = document.getElementById("upsertPriceModal");
  const modalTitle = document.getElementById("modalTitle");
  const modalInput = document.getElementById("modalInput");
  const btnConfirm = document.getElementById("modalConfirm");
  const btnCancel = document.getElementById("modalCancel");

  modal.classList.remove("hidden");

  modalTitle.innerHTML = title;
  modalInput.value = defaultValue;

  const newBtnConfirm = btnConfirm.cloneNode(true);
  const newBtnCancel = btnCancel.cloneNode(true);
  btnConfirm.parentNode.replaceChild(newBtnConfirm, btnConfirm);
  btnCancel.parentNode.replaceChild(newBtnCancel, btnCancel);

  newBtnConfirm.addEventListener("click", () => {
    const value = modalInput.value;
    modal.classList.add("hidden");
    if (onConfirm) onConfirm(value);
  });

  newBtnCancel.addEventListener("click", () => {
    modal.classList.add("hidden");
    startDate = null;
    endDate = null;
  });
}


