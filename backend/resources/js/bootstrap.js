import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { setModalAddItem, setModalEditItem, setModalDeleteItem, closeModal } from './modal';
window.setModalAddItem = setModalAddItem;
window.setModalEditItem = setModalEditItem;
window.setModalDeleteItem = setModalDeleteItem;
window.closeModal = closeModal;

import { setStyleBtnFile } from './button';
window.setStyleBtnFile = setStyleBtnFile;