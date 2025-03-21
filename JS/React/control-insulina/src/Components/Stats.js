import { useState, useEffect, useContext } from "react";
import { ValidationContext } from "../Components/ValidationContext";

const Stats = () => {
  const { validateAge } = useContext(ValidationContext);
  const [stats, setStats] = useState({
    average: null,
    min: null,
    max: null,
  });
  const [error, setError] = useState("");
  const [birthdate, setBirthdate] = useState("");
  
  useEffect(() => {
    if (!birthdate) return; // No calcular si no hay fecha
    const age = validateAge(birthdate);
    if (age < 18) {
      setError("Debes tener al menos 18 años para ver las estadísticas.");
      return;
    }

    setError(""); // Edad valida

    fetch("http://localhost/Servidor/JS/React/control-insulina/api/Stats.php")
      .then((response) => response.json())
      .then((data) => {
        setStats({
          average: data.average,
          min: data.min,
          max: data.max,
        });
      })
      .catch((err) => {
        console.error("Error al obtener las estadísticas:", err);
      });
  }, [birthdate, validateAge]);

  const handleChange = (e) => {
    setBirthdate(e.target.value);
  };

  return (
    <div>
      <h1>Estadísticas de Insulina LENTA</h1>
      
      <input
        type="date"
        name="birthdate"
        onChange={handleChange}
        required
      />
      
      {error && <p style={{ color: "red" }}>{error}</p>}
      
      {!error && stats.average !== null && (
        <div>
          <p>Valor Medio LENTA: {stats.average}</p>
          <p>Valor Mínimo LENTA: {stats.min}</p>
          <p>Valor Máximo LENTA: {stats.max}</p>
        </div>
      )}
    </div>
  );
};

export default Stats;
