const UserTable = ({ users, refreshUsers }) => {
    const deleteUser = async (username) => {
      await fetch(`http://localhost/api/delete_user.php?username=${username}`, { method: "DELETE" });
      refreshUsers();
    };
  
    return (
      <table border="1" style={{ width: "100%", marginTop: "20px" }}>
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Fecha Nacimiento</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          {users.map(user => (
            <tr key={user.username}>
              <td>{user.username}</td>
              <td>{user.name} {user.lastname}</td>
              <td>{user.birthdate}</td>
              <td>
                <button onClick={() => deleteUser(user.username)}>❌ Eliminar</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    );
  };
  
  export default UserTable;
  