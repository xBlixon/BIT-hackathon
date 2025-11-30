<script lang="ts">
 import * as DropdownMenu from "@/components/ui/dropdown-menu";
 import { Button } from "@/components/ui/button";
    import { boolean } from "zod/v3";
 
 let showStatusBar = $state(true);
 let showActivityBar = $state(false);
 let showPanel = $state(false);
 let {allTags} = $props();
 let checkedTags = $state(new Array(allTags.length).fill(false));
 
</script>
 
<DropdownMenu.Root>
 <DropdownMenu.Trigger>
  {#snippet child({ props })}
   <Button {...props} variant="outline">Tags</Button>
  {/snippet}
 </DropdownMenu.Trigger>
 <DropdownMenu.Content class="w-56">
  <DropdownMenu.Group>
   <DropdownMenu.Label>Tags:</DropdownMenu.Label>
   <DropdownMenu.Separator />
   {#each allTags as tag,i}
   
   <DropdownMenu.CheckboxItem bind:checked={checkedTags[i]}>
    {tag.name}
</DropdownMenu.CheckboxItem>
{/each}
  </DropdownMenu.Group>
 </DropdownMenu.Content>
</DropdownMenu.Root>