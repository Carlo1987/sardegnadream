
function setModalAddItem(datas){
    setModalTexts('upsert',datas.texts);
    setModal('btn-add-modal', datas.data);
}

function setModalEditItem(datas){
    setModalTexts('upsert',datas.texts);
    setModal('btn-edit-modal', datas.data);
}

function setModalDeleteItem(datas){
    setModalTexts('delete',datas.texts);
    setModal('btn-delete-modal', datas.data);
} 

function setModal(buttonsClass, data){
    const buttons = document.querySelectorAll(`.${buttonsClass}`);
    buttons.forEach(button => {
        button.onclick = function(){
            setInputsModal(button, data); 
/* 
            const image = button.getAttribute(`data-image`);
            if(image){
                changeStyleBtnImage(image);
            } */
        }
    })
}

//  Metodo per settare gli inputs di una modal
function setInputsModal(button, datas){
   datas.forEach(data => {
        const inputId = data.input ?? data.data; 
        const dataValue = button.getAttribute(`data-${data.data}`)
        document.querySelector(`#${inputId}`).value = dataValue;
/*         if(data.checks){
            setChecks(dataValue);
        } */
   });
}


function setChecks(dataValue){
    const checksId = dataValue.split(',');   
    checksId.forEach(checkId => {
        const checkboxId = `#check_${checkId}`;  
        const checkbox = document.querySelector(checkboxId);
        if(checkbox){
            checkbox.checked = true;
        }
    })
}



//  Metodo per settare il titolo di una modal
function setModalTexts(className, texts){
    const modalTitle = document.querySelector(`.title-${className}-modal`);
    const modalDescription = document.querySelector(`.description-${className}-modal`);
    modalTitle.innerHTML = texts.title;
    modalDescription.innerHTML = texts.description;
}


function closeModal(){
    const btnClose = document.querySelector('.btn-close-modal');
    btnClose.onclick = function(){
        const form = document.querySelector('#form');
        form.reset();
       // changeStyleBtnImage(null);
    }
}

export { setModalAddItem, setModalEditItem, setModalDeleteItem, closeModal }