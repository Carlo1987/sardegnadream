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
           dateClick: function(info) {
                console.log('info', info);
                if (!startDate) {
                    startDate = info.date;
                } else {
                    endDate = info.date;
                                        
                    let exclusiveEnd = new Date(endDate);
                    exclusiveEnd.setDate(exclusiveEnd.getDate() + 1);

                    calendar.select({
                        start: startDate,
                        end: exclusiveEnd,
                        allDay: true
                    });

                    startDate = null;
                    endDate = null;
                }

            
            }
        });
        calendar.render();
        setYear(calendar);
      //  populateDayMonthSelects();
       // addPriceToCalendar(calendar);
    })
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


function populateDayMonthSelects() {
    const daySelects = [document.getElementById('startDay'), document.getElementById('endDay')];
    const monthSelects = [document.getElementById('startMonth'), document.getElementById('endMonth')];

    for (let i = 1; i <= 31; i++) {
        daySelects.forEach(sel => {
            let opt = document.createElement('option');
            opt.value = i;
            opt.text = i;
            sel.appendChild(opt);
        });
    }

    const monthNames = [
        "Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno",
        "Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"
    ];

    monthSelects.forEach(sel => {
        monthNames.forEach((name, index) => {
            let opt = document.createElement('option');
            opt.value = index;  // 0 = Gennaio
            opt.text = name;
            sel.appendChild(opt);
        });
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
        console.log('click')
        if (!price) return alert("Inserisci un prezzo!");

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



