export const fetchUsers = async () => {
  const res = await fetch("http://localhost/api/get_users.php");
  return await res.json();
};

export const fetchStats = async () => {
  try {
    const res = await fetch("http://localhost/api/get_stats.php");
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

export const addUser = async (user) => {
  try {
    const res = await fetch("http://localhost/api/get_users.php", {
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