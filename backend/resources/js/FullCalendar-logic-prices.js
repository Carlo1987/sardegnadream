import { DateTime, Interval } from "luxon";

function parseLuxon(dateStr) {
    return DateTime.fromFormat(dateStr, "dd/MM/yyyy");
}

function _format(date) {
    return date.toFormat("dd/MM/yyyy");
}

function calendaraddEvent(calendar, day, price) {
    calendar.addEvent({
        id: "day-" + day.toISOString(),
        start: day,
        end: new Date(day.getFullYear(), day.getMonth(), day.getDate() + 1),
        allDay: true,
        display: "background",
        classNames: ["selected-days"],
        extendedProps: { price: price },
    });

}

function initDays(calendar){
    const initialHomePrices = document.getElementById("home_prices").value;
    if (initialHomePrices) {
        try {
            const home_prices = JSON.parse(initialHomePrices);

            home_prices.forEach(range => {
                const from = parseLuxon(range.from);
                const to = parseLuxon(range.to);
                range.id = range.id ?? null;

                let current = from;
                while (current <= to) {
                    let day = current.toJSDate();
                    calendaraddEvent(calendar, day, range.price);
                    current = current.plus({ days: 1 });
                }
            });
        } catch (e) {
            console.error("Errore parsing home_prices:", e);
        }
    }
}

function removeDays(date, days = 1){
    return date.minus({ days: days }).toFormat("dd/MM/yyyy")
}

function addDays(date, days = 1){
    return date.plus({ days: days }).toFormat("dd/MM/yyyy")
}

function mergePrices(home_prices, newRange) {
    let array_prices = home_prices;
    const newFrom = parseLuxon(newRange.from);
    const newTo   = parseLuxon(newRange.to);
    const newPrice = newRange.price;

    const newInterval = Interval.fromDateTimes(newFrom, newTo);

    const overlappedObjs = array_prices.filter(obj => {
        const objFrom = parseLuxon(obj.from);
        const objTo   = parseLuxon(obj.to);
        const objInterval = Interval.fromDateTimes(objFrom.minus({ days: 1 }), objTo.plus({ days: 1 }));

        return newInterval.overlaps(objInterval);
    });

    if (overlappedObjs.length === 0) {
        array_prices.push(newRange);
    } else {
        overlappedObjs.forEach(obj => {
            const objFrom = parseLuxon(obj.from);
            const objTo   = parseLuxon(obj.to);
            const objPrice = obj.price;
     
            if (newFrom >= objFrom && newTo >= objTo){
                if(newPrice != objPrice){
                    if(newFrom.equals(objFrom)){
                        obj.to = _format(newTo);
                        obj.price = newPrice;
                       
                    }else{
                        obj.to = removeDays(newFrom);
                        array_prices.push(newRange);
                    }
                }else{
                    obj.to = _format(newTo);
                }
            }else if(newFrom < objFrom && newTo <= objTo){
                if(newPrice != objPrice){
                    if(newTo.equals(objTo)){
                        obj.to = _format(newTo);
                        obj.price = newPrice;
    
                    }else{
                        obj.from = addDays(newTo);
                        array_prices.push(newRange);
                    }
                }else{
                    obj.from = _format(newFrom);
                }
            }else if(newFrom < objFrom && newTo > objTo){
                obj.from = _format(newFrom);
                obj.to = _format(newTo);
                if(newPrice != objPrice){
                    obj.price = newPrice;
                }
            }else if(newFrom >= objFrom && newTo <= objTo){  
                if(newPrice != objPrice){
                    if(newFrom.equals(objFrom) && !newTo.equals(objTo)){
                        obj.from = addDays(newTo);
                        array_prices.push(newRange);
                  
                    }else if(!newFrom.equals(objFrom) && newTo.equals(objTo)){
                        obj.to = removeDays(newFrom);
                        array_prices.push(newRange);
              
                    }else if(!newFrom.equals(objFrom) && !newTo.equals(objTo)){
                        const objSlipt = {
                            from : addDays(newTo),
                            to : _format(objTo),
                            price : objPrice
                        }
                        array_prices.push(objSlipt);
                        obj.to = removeDays(newFrom);  
                        array_prices.push(newRange);
                    } 
                }
            }
        });
    }
    return mergeRanges(array_prices);
}


function mergeRanges(ranges) {
  const sorted = ranges.slice().sort((a, b) => {
    if (a.price !== b.price) return a.price - b.price;

    const aFrom = parseLuxon(a.from);
    const bFrom = parseLuxon(b.from);
    const cmpFrom = aFrom.toMillis() - bFrom.toMillis();
    if (cmpFrom !== 0) return cmpFrom;

    const aTo = parseLuxon(a.to);
    const bTo = parseLuxon(b.to);
    return aTo.toMillis() - bTo.toMillis();
  });

  const array_prices_merged = [];

  for (let current of sorted) {
    const currFrom = parseLuxon(current.from);
    const currTo = parseLuxon(current.to);

    let merged = false;

    for (let r of array_prices_merged) {
      if (r.price === current.price) {
        const rFrom = parseLuxon(r.from);
        const rTo = parseLuxon(r.to);

        if (currFrom >= rFrom && currTo <= rTo) {
          merged = true;
          break;
        }
        if (rFrom >= currFrom && rTo <= currTo) {
          r.from = _format(currFrom);
          r.to = _format(currTo);
          merged = true;
          break;
        }
        if (currFrom <= rTo && currTo >= rFrom) {
          const newFrom = currFrom < rFrom ? currFrom : rFrom;
          const newTo = currTo > rTo ? currTo : rTo;
          r.from = _format(newFrom);
          r.to = _format(newTo);
          merged = true;
          break;
        }
      }
    }

    if (!merged) {
      array_prices_merged.push({ ...current });
    }
  }
  return array_prices_merged;
}


function removePrices(home_prices, removeRange){
    const remFrom = parseLuxon(removeRange.from);
    const remTo = parseLuxon(removeRange.to);
    let array_prices = home_prices;

    const newInterval = Interval.fromDateTimes(remFrom, remTo);

    const overlappedObjs = array_prices.filter(obj => {
        const objFrom = parseLuxon(obj.from);
        const objTo   = parseLuxon(obj.to);
        const objInterval = Interval.fromDateTimes(objFrom.minus({ days: 1 }), objTo.plus({ days: 1 }));

        return newInterval.overlaps(objInterval);
    });

    if(overlappedObjs.length > 0){
        overlappedObjs.forEach(obj => {
            const objFrom = parseLuxon(obj.from);
            const objTo = parseLuxon(obj.to);
     
            if(remFrom >= objFrom && remTo >= objTo){
                if(remFrom.equals(objFrom)){
                    obj.price = null;
                }else{
                    obj.to = removeDays(remFrom);
                }
            }else if(remFrom < objFrom && remTo <= objTo){
                if(remTo.equals(objTo)){
                    obj.price = null;
                }else{
                    obj.from = addDays(remTo);
                }
            }else if(remFrom < objFrom && remTo > objTo){
                obj.price = null;
            
            }else if(remFrom > objFrom && remTo < objTo){
                const objSlipt = {
                    from : addDays(remTo),
                    to : _format(objTo),
                    price : obj.price
                }
                array_prices.push(objSlipt);
                obj.to = removeDays(remFrom);
            }
        });
    }

    return array_prices.filter(obj => obj.price !== null);
}

export { initDays, calendaraddEvent, mergePrices, removePrices }