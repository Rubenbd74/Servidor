export const fetchUsers = async () => {
    const res = await fetch("http://localhost/api/get_users.php");
    return await res.json();
  };
  