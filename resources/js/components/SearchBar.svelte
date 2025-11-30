<script lang="ts">
 import { Button } from "@/components/ui/button/";
 import { Input } from "@/components/ui/input/";
 import TagsDropdown from "@/components/TagsDropdown.svelte";
 let {allTags} = $props();
 let search = $state();

 function updateQueryParameter(key, value) {
     // 1. Get the current URL
     const url = new URL(window.location.href);

     // 2. Access the query string parameters object
     const params = url.searchParams;

     // 3. Update the specific parameter
     if (value === null || value === '') {
         // Remove the parameter if the value is null or empty
         params.delete(key);
     } else {
         // Set/Update the parameter
         params.set(key, value);
     }

     // 4. Redirect to the new URL
     window.location.href = url.toString();
 }
</script>

<form class="flex w-full max-w-sm items-center space-x-2">
 <Input placeholder="search" bind:value={search} />
<TagsDropdown allTags={allTags}/>
 <Button onclick={() => {
     updateQueryParameter("search", search);
 }}
 >Search</Button>
</form>
