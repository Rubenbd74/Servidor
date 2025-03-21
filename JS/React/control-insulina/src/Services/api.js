export const fetchUsers = async () => {
  try {
    const response = await fetch("http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php");
    if (!response.ok) throw new Error(`Error HTTP: ${response.status}`);
    
    const data = await response.json();
    return Array.isArray(data) ? data : [];
  } catch (error) {
    console.error("Error fetching users:", error);
    return [];
  }
};


export const fetchStats = async () => {
  try {
    const response = await fetch("http://localhost:8080/Servidor/JS/React/control-insulina/api/Stats.php");
    if (!response.ok) {
      throw new Error(`Error fetching stats: ${response.status}`);
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const updateUser = async (user) => {
  try {
    const response = await fetch(`http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php?id=${user.id}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(user),
    });
    if (!response.ok) {
      throw new Error(`Error updating user: ${response.status}`);
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const deleteUser = async (id) => {
  try {
    const response = await fetch(`http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php?id=${id}`, {
      method: "DELETE",
    });
    if (!response.ok) {
      throw new Error(`Error deleting user: ${response.status}`);
    }
    return response.ok;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const addUser = async (user) => {
  try {
    const response = await fetch("http://localhost:8080/Servidor/JS/React/control-insulina/api/Users.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(user),
    });
    if (!response.ok) {
      throw new Error(`Error adding user: ${response.status}`);
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};