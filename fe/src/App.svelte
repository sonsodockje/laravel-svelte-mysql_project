<script>
  import { onMount } from 'svelte';

  let data = null;
  let error = null;

  onMount(async () => {
    try {
      const res = await fetch('/api/'); // Vite 프록시를 통해 백엔드로 요청 
      console.log(res)
      if (!res.ok) {
        throw new Error(`HTTP error! status: ${res.status}`);
      }
      data = await res.json();
    } catch (e) {
      error = e.message;
    }
  });
</script>

<h1>Backend Data</h1>
{#if data}
  {#each data as item (item.id)}
    <p>{item.text}</p>
  {/each}
{:else if error}
  <p style="color: red;">Error: {error}</p>
{:else}
  <p>Loading...</p>
{/if}