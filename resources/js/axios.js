
import axios from 'axios';
const axiosInstance = axios.create({
  baseURL: 'http://localhost:8000', 
});

axiosInstance.interceptors.request.use(config => {
  const applicationToken = localStorage.getItem('token'); 
  if (applicationToken) {
    const token = applicationToken.replace(/['"]+/g, '');
    config.headers.Authorization = `Bearer ${token}`;
  } else {
    console.warn('no token found in local storage');    
  }
  return config;
}, error => {
  return Promise.reject(error);
});

export default axiosInstance;