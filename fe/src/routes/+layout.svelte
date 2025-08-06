<script>
	import '../app.css';
	import favicon from '../lib/assets/favicon.svg';
	import Header from '../components/Header.svelte';

	let { children } = $props();
</script>

<svelte:head>
	<link rel="icon" href={favicon} />
	<title>BullPan</title>
</svelte:head>

<div class="m-auto flex flex-col max-w-[1200px]">
	<Header />
	<main>
		{@render children?.()}
	</main>
</div>
