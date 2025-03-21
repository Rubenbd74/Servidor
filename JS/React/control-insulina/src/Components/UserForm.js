import { useState, useContext } from "react";
import { ValidationContext } from "../Components/ValidationContext";

const UserForm = ({ refreshUsers }) => {
  const { reg, validateAge } = useContext(ValidationContext);
  const [formData, setFormData] = useState({
    username: "",
    password: "",
    name: "",
    lastname: "",
    birthdate: "",
  });
  const [error, setError] = useState("");

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    const age = validateAge(formData.birthdate);

    if (age < 18) {
      setError("Debes tener al menos 18 años para registrarte.");
      return;
    }

    if (!reg.username.test(formData.username)) {
      setError("El nombre de usuario debe empezar con una letra y tener al menos 6 caracteres.");
      return;
    }

    if (!reg.password.test(formData.password)) {
      setError("La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.");
      return;
    }

    setError("");
    await fetch("http://localhost/Servidor/JS/React/control-insulina/api/add_user.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(formData),
    });
    refreshUsers();
  };

  return (
    <form onSubmit={handleSubmit}>
      <input type="text" name="username" placeholder="Usuario" onChange={handleChange} required />
      <input type="password" name="password" placeholder="Contraseña" onChange={handleChange} required />
      <input type="text" name="name" placeholder="Nombre" onChange={handleChange} required />
      <input type="text" name="lastname" placeholder="Apellidos" onChange={handleChange} required />
      <input type="date" name="birthdate" onChange={handleChange} required />
      {error && <p style={{ color: "red" }}>{error}</p>}
      <button type="submit">Agregar Usuario</button>
    </form>
  );
};

export default UserForm;
