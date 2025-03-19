import { useState } from "react";

const UserForm = ({ refreshUsers }) => {
  const [formData, setFormData] = useState({
    username: "",
    password: "",
    name: "",
    lastname: "",
    birthdate: "",
  });

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    await fetch("http://localhost/api/add_user.php", {
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
      <button type="submit">Agregar Usuario</button>
    </form>
  );
};

export default UserForm;
