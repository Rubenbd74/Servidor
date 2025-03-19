import { Link } from "react-router-dom";

const NavBar = () => {
  return (
    <nav style={{ padding: "10px", background: "#93673f" }}>
      <Link to="/" style={{ marginRight: "15px", color: "#fff" }}>Usuarios</Link>
      <Link to="/stats" style={{ color: "#fff" }}>Estadísticas</Link>
    </nav>
  );
};

export default NavBar;
