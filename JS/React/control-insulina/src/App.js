import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import NavBar from "./Components/Navbar";
import UsersPage from "./Pages/UsersPage";
import StatsPage from "./Pages/StatsPage";
import { ValidationProvider } from './Components/ValidationContext';

function App() {
  return (
    <ValidationProvider>
      <Router>
        <NavBar />
        <Routes>
          <Route path="/" element={<UsersPage />} />
          <Route path="/stats" element={<StatsPage />} />
        </Routes>
      </Router>
    </ValidationProvider>
  );
}

export default App;

