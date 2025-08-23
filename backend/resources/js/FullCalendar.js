import { Calendar } from '@fullcalendar/core';
import itLocale from '@fullcalendar/core/locales/it';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import { mergePrices, removePriceRange } from "./FullCalendar-merge-prices";

let startDate = null;
let endDate = null;
let home_prices = [];

export default function FullCalendar() {
    document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendar');
        let calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            selectable: true,
            locale: itLocale,
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: ''
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
                return {};
            },
            dateClick: function (info) {
                if (!startDate) {
                    startDate = info.date;
                } else {
                    endDate = info.date;

                    let from = startDate < endDate ? startDate : endDate;
                    let to = startDate < endDate ? endDate : startDate;
                    setDays({ calendar, from, to });
                }
            }
        });
        calendar.render();
        setYearAndMonth(calendar);
    });
}

function setDays({ calendar, from, to }) {
    const from_string = from.toLocaleDateString();
    const to_string = to.toLocaleDateString();

    let title_modal = from_string + " --- " + to_string;
    if(from_string == to_string){
        title_modal = from_string;
    }

    openModal({
        title: title_modal,
        onConfirm: (price) => {
            calendar.getEvents().forEach(ev => {
                if (ev.start >= from && ev.start <= to) {
                    ev.remove();
                }
            });
            let current = new Date(from);
            while (current <= to) {
                let day = new Date(current);

                calendar.addEvent({
                    id: "day-" + day.toISOString(),
                    start: day,
                    end: new Date(day.getFullYear(), day.getMonth(), day.getDate() + 1),
                    allDay: true,
                    display: "background",
                    classNames: ["selected-days"],
                    extendedProps: { price: price },
                });

                current.setDate(current.getDate() + 1);
            }

            home_prices = mergePrices(home_prices, {
                from: from_string,
                to: to_string,
                price: parseFloat(price)
            })
            console.log(home_prices);
            startDate = null;
            endDate = null;
        },
        onClear: () => {
            calendar.getEvents().forEach(ev => {
                if (ev.start >= from && ev.start <= to) {
                    ev.remove();
                }
            });

            home_prices = removePriceRange(home_prices, {
                from: from_string,
                to: to_string
            });

            startDate = null;
            endDate = null;
        }
    });
}

function setYearAndMonth(calendar){
    const yearSelect = document.getElementById('yearSelect');
    const monthSelect = document.getElementById('monthSelect');

    function gotoSelectedDate() {
        let selectedYear = parseInt(yearSelect.value);
        let selectedMonth = parseInt(monthSelect.value) - 1; 
        let currentDay = calendar.getDate().getDate();

        calendar.gotoDate(new Date(selectedYear, selectedMonth, currentDay));
    }

    yearSelect.addEventListener('change', gotoSelectedDate);
    monthSelect.addEventListener('change', gotoSelectedDate);

    const currentDate = calendar.getDate();
    yearSelect.value = currentDate.getFullYear();
    monthSelect.value = String(currentDate.getMonth() + 1).padStart(2, "0");
}

function openModal({ title, defaultValue = "", onConfirm, onClear }) {
    const modal = document.getElementById("modalPrice");
    const modalTitle = document.getElementById("modalTitle");
    const modalInput = document.getElementById("modalInput");
    const btnConfirm = document.getElementById("modalConfirm");
    const btnCancel = document.getElementById("modalCancel");
    const btnClear = document.getElementById("modalClear");
    const spinner = document.getElementById("loading");
    setLoading(spinner, false);
    setError(false);

    modal.classList.remove("hidden");
    modalTitle.innerHTML = title;
    modalInput.value = defaultValue;

    const newBtnConfirm = btnConfirm.cloneNode(true);
    const newBtnCancel = btnCancel.cloneNode(true);
    const newBtnClear = btnClear.cloneNode(true);
    btnConfirm.parentNode.replaceChild(newBtnConfirm, btnConfirm);
    btnCancel.parentNode.replaceChild(newBtnCancel, btnCancel);
    btnClear.parentNode.replaceChild(newBtnClear, btnClear);

    newBtnConfirm.addEventListener("click", () => {  
    setLoading(spinner, true);
    setError(false);
    if (onConfirm){
        const value = modalInput.value;
        if(value <= 0){
            setError(true);
            setLoading(spinner, false);
            return;
        }
        setTimeout(() => {
            onConfirm(value);
            modal.classList.add("hidden");
        }, 50); 
    } 
});


    newBtnClear.addEventListener("click", () => {    
        setLoading(spinner, true); 
        setError(false);
        if (onClear){
            setTimeout(() => {
                onClear();
                modal.classList.add("hidden")
            }, 50); 
        } 
        startDate = null;
        endDate = null;
    });

    newBtnCancel.addEventListener("click", () => {
        modal.classList.add("hidden");
        startDate = null;
        endDate = null;
    });
}

function setLoading(spinner, isLoading){
    if(isLoading){
        if(spinner.classList.contains("hidden")){
            spinner.classList.remove("hidden");
        }
    }else{
        if(!spinner.classList.contains("hidden")){
            spinner.classList.add("hidden");
        }
    }
}

function setError(isValid){
    const error = document.getElementById("error");
    if(isValid){
        if(error.classList.contains("hidden")){
            error.classList.remove("hidden");
        }
    }else{
        if(!error.classList.contains("hidden")){
            error.classList.add("hidden");
        }
    }
}

