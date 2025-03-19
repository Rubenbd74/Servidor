import { useEffect, useState } from "react";
import UserTable from "../Components/UserTable";
import UserForm from "../Components/UserForm";
import { fetchUsers } from "../Services/api";

const UsersPage = () => {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    fetchUsers().then(setUsers);
  }, []);

  return (
    <div>
      <h1>Gestión de Usuarios</h1>
      <UserForm refreshUsers={() => fetchUsers().then(setUsers)} />
      <UserTable users={users} refreshUsers={() => fetchUsers().then(setUsers)} />
    </div>
  );
};

export default UsersPage;
