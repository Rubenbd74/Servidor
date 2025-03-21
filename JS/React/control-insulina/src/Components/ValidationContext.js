import React, { createContext } from 'react';

export const ValidationContext = createContext();

export const ValidationProvider = ({ children }) => {
  const reg = {
    usuario: /^[a-z][a-z0-9]{5,}$/,
    contra: /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/,
  };

  const validateAge = (fecha_nacimiento) => {
    const fecha_nacimiento = new Date(fecha_nacimiento);
    const today = new Date();
    const age = today.getFullYear() - fecha_nacimiento.getFullYear();
    const monthDiff = today.getMonth() - fecha_nacimiento.getMonth();
    const dayDiff = today.getDate() - fecha_nacimiento.getDate();

    // Restar 1 si el cumpleaños aún no ha ocurrido en este año
    if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
      return age - 1;
    }
    return age;
  };

  return (
    <ValidationContext.Provider value={{ reg, validateAge }}>
      {children}
    </ValidationContext.Provider>
  );
};
