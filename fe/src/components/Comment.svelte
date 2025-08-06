<script>
	let textValue = '';
	let isSubmitting = false;

	/** @param {Event} event */
	async function handleForm(event) {
		event.preventDefault();
		isSubmitting = true;

		console.log(textValue);

		try {
			const response = await fetch('/api/post-comment', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({ text: textValue })
			});
			if (response.ok) {
				console.log('데이터 전송 성공!');
			} else {
				console.error('데이터 전송 실패:', response.status);
			}
		} catch (error) {
			console.error('네트워크 오류:', error);
		} finally {
			textValue = '';
			isSubmitting = false;
		}
	}
</script>

<form on:submit={handleForm} method="post">
	<input type="text" class="border border-gray-50" bind:value={textValue} required />

	<button type="submit" disabled={isSubmitting}>
		{isSubmitting ? '전송 중...' : '전송'}
	</button>
</form>

