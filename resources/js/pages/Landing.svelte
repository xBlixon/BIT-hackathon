<script>
    let { isLoggedIn } = $props()
</script>

<main>
    <p> this is the initial landing page Hello :P</p>
    <p>{isLoggedIn ? "EZ" : ":("}</p>
</main>
