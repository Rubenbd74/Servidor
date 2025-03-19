import { useEffect, useState } from "react";
import { Chart } from "react-chartjs-2";
import { fetchStats } from "../Services/api";

const StatsPage = () => {
  const [stats, setStats] = useState(null);

  useEffect(() => {
    fetchStats().then(setStats);
  }, []);

  return stats ? (
    <div>
      <h1>Estadísticas de Insulina</h1>
      <p>Media: {stats.avg}</p>
      <p>Mínimo: {stats.min}</p>
      <p>Máximo: {stats.max}</p>
      <Chart type="line" data={stats.chartData} />
    </div>
  ) : <p>Cargando...</p>;
};

export default StatsPage;
