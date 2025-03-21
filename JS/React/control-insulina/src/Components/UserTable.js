const UserTable = ({ users, refreshUsers }) => {
  const deleteUser = async (id_usu) => {
    await fetch(`http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php`, {
      method: "DELETE",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id_usu }),
    });
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
          <tr key={user.id_usu}>
            <td>{user.usuario}</td>
            <td>{user.nombre} {user.apellidos}</td>
            <td>{user.fecha_nacimiento}</td>
            <td>
              <label>Eliminar  </label><button onClick={() => deleteUser(user.id_usu)}>X</button>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
};

export default UserTable;
