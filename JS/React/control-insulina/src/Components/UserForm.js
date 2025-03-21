import { useState, useContext } from "react";
import { ValidationContext } from "../Components/ValidationContext";

const UserForm = ({ refreshUsers }) => {
  const { reg, validateAge } = useContext(ValidationContext); // Desestructuramos reg y validateAge
  const [formData, setFormData] = useState({
    usuario: "",
    contra: "",
    nombre: "",
    apellidos: "",
    fecha_nacimiento: "",
  });
  const [error, setError] = useState("");

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    // Validación de los datos usando el reg y validateAge
    if (!reg.usuario.test(formData.usuario)) {
      setError("El nombre de usuario no es válido.");
      return;
    }

    if (!reg.contra.test(formData.contra)) {
      setError("La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula y un número.");
      return;
    }

    const age = validateAge(formData.fecha_nacimiento);
    if (age < 18) {
      setError("Debes tener al menos 18 años.");
      return;
    }

    const newData = {
      usuario: formData.usuario,
      contra: formData.contra,
      nombre: formData.nombre,
      apellidos: formData.apellidos,
      fecha_nacimiento: formData.fecha_nacimiento,
    };

    console.log("Datos enviados:", newData);

    const response = await fetch("http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(newData),
    });

    const data = await response.json();
    console.log("Respuesta del servidor:", data);

    if (data.error) {
      setError(data.error);
      return;
    }

    refreshUsers();
  };

  
  return (
    <form onSubmit={handleSubmit}>
      <input type="text" name="usuario" placeholder="Usuario" onChange={handleChange} required />
      <input type="password" name="contra" placeholder="Contraseña" onChange={handleChange} required />
      <input type="text" name="nombre" placeholder="Nombre" onChange={handleChange} required />
      <input type="text" name="apellidos" placeholder="Apellidos" onChange={handleChange} required />
      <input type="date" name="fecha_nacimiento" onChange={handleChange} required />
      {error && <p style={{ color: "red" }}>{error}</p>}
      <button type="submit">Agregar Usuario</button>
    </form>
  );
};

export default UserForm;
