<script lang="ts">
 import { Button } from "@/components/ui/button/";
 import { Input } from "@/components/ui/input/";
 import TagsDropdown from "@/components/TagsDropdown.svelte";
 let {allTags} = $props();
</script>
 
<form class="flex w-full max-w-sm items-center space-x-2">
 <Input placeholder="search" />
<TagsDropdown allTags={allTags}/>
 <Button type="submit">Search</Button>
</form>