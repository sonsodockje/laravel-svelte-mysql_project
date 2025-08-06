export async function load({ fetch }) {
  try {
    const res = await fetch('/api/');
    if (!res.ok) {
      throw new Error(`HTTP error! status: ${res.status}`);
    }
    const data = await res.json();
    return { data };
  } catch (e) {
    if (e instanceof Error) {
      return { error: e.message };
    }
    return { error: 'An unknown error occurred' };
  }
}