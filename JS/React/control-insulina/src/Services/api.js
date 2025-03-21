export const fetchUsers = async () => {
  try {
    const response = await fetch("http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php");
    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
    return await response.json();
  } catch (error) {
    console.error("Error fetching users:", error);
    return [];
  }
};

export const fetchStats = async () => {
  try {
    const res = await fetch("http://localhost:8080/Servidor/JS/React/control-insulina/api/Stats.php");
    if (!res.ok) {
      throw new Error(`Error fetching stats: ${res.status}`);
    }
    const data = await res.json();
    return data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const updateUser = async (user) => {
  try {
    const res = await fetch(`http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php?id=${user.id}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(user),
    });
    if (!res.ok) {
      throw new Error(`Error updating user: ${res.status}`);
    }
    const data = await res.json();
    return data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const deleteUser = async (id) => {
  try {
    const res = await fetch(`http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php?id=${id}`, {
      method: "DELETE",
    });
    if (!res.ok) {
      throw new Error(`Error deleting user: ${res.status}`);
    }
    return res.ok;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const addUser = async (user) => {
  try {
    const res = await fetch("http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(user),
    });
    if (!res.ok) {
      throw new Error(`Error adding user: ${res.status}`);
    }
    const data = await res.json();
    return data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};