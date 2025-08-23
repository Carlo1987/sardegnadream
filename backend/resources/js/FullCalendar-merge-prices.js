import { DateTime, Interval } from "luxon";

function parseLuxon(dateStr) {
    return DateTime.fromFormat(dateStr, "dd/MM/yyyy");
}

function _format(date) {
    return date.toFormat("dd/MM/yyyy");
}

function removeDays(date, days = 1){
    return date.minus({ days: days }).toFormat("dd/MM/yyyy")
}

function mergePrices(home_prices, newRange) {
    const newFrom = parseLuxon(newRange.from);
    const newTo   = parseLuxon(newRange.to);
    const newPrice = newRange.price;

    const newInterval = Interval.fromDateTimes(newFrom, newTo);

    // Trova gli oggetti sovrapposti
    const overlappedObjs = home_prices.filter(obj => {
        const objFrom = parseLuxon(obj.from);
        const objTo   = parseLuxon(obj.to);
        const objInterval = Interval.fromDateTimes(objFrom, objTo.plus({ days: 1 }));

        return newInterval.overlaps(objInterval);
    });

    if (overlappedObjs.length === 0) {
        home_prices.push(newRange);
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
                        home_prices.push(newRange);
                    }
                }else{
                    obj.to = _format(newTo);
                }
            }  //  
        });
        
    }
    console.log('overlappedObjs',overlappedObjs);
    return home_prices;
}


// Funzione per rimuovere un range di prezzi (spezzando gli intervalli se necessario)
function removePriceRange(home_prices, removeRange){
    const remFrom = new Date(removeRange.from);
    const remTo = new Date(removeRange.to);
    let temp = home_prices;

    home_prices.forEach(obj => {
        const objFrom = new Date(obj.from);
        const objTo = new Date(obj.to);

        if(remTo < objFrom || remFrom > objTo){
            // Nessuna sovrapposizione
            temp.push(obj);
        } else {
            // Parte prima del range da rimuovere
            if(objFrom < remFrom){
                temp.push({
                    from: obj.from,
                    to: formatDate(new Date(remFrom.getTime() - 86400000)),
                    price: obj.price
                });
            }

            // Parte dopo il range da rimuovere
            if(objTo > remTo){
                temp.push({
                    from: formatDate(new Date(remTo.getTime() + 86400000)),
                    to: obj.to,
                    price: obj.price
                });
            }
        }
    });

    return temp;
}


export { mergePrices, removePriceRange }