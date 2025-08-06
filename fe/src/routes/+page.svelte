<script>
  import Comment from '../components/Comment.svelte';
  import PanInfo from '../components/PanInfo.svelte';
  import { onMount, onDestroy } from 'svelte';
  import { echo } from '../lib/echo';

  /** @type {import('./$types').PageData} */
  export let data;

  onMount(() => {
    echo.channel('comments')
      .listen('CommentPosted', (e) => {
        data.data = [...data.data, e.comment];
      });
  });

  onDestroy(() => {
    echo.leave('comments');
  });

</script>

<PanInfo />

{#if data.data}
  {#each data.data as item (item.id)}
    <p>{item.text} <span>{item?.created_at}</span></p>
  {/each}
{:else if data.error}
  <p style="color: red;">Error: {data.error}</p>
{:else}
  <p>Loading...</p>
{/if}

<Comment />