
import axios from 'axios';
const axiosInstance = axios.create({
  baseURL: 'http://localhost:8000', 
});

axiosInstance.interceptors.request.use(config => {
  // debugger;
  const token = localStorage.getItem('token'); 
  console.log('retrive token', token);
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  } else {
    console.warn('no token found in local storage');    
  }
  return config;
}, error => {
  return Promise.reject(error);
});

export default axiosInstance;