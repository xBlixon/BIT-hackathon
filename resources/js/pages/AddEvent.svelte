<script lang="ts">
    import { useForm } from '@inertiajs/svelte';
    import { Button } from "@/components/ui/button";
    import { Input } from "@/components/ui/input";
    import { Label } from "@/components/ui/label";
    import { Textarea } from "@/components/ui/textarea";
    import * as Card from "@/components/ui/card";
    import { Checkbox } from "@/components/ui/checkbox";
    import { LoaderCircle } from 'lucide-svelte';

    // 1. Get available tags from the backend to show in the list
    let { allTags } = $props();

    // 2. Initialize the Inertia form
    const form = useForm({
        title: '',
        description: '',
        date: '',
        max_people: 10,
        tags: [] as number[] // Array of Tag IDs
    });

    // 3. Handle Form Submission
    function submit() {
        // This sends a POST request to your Laravel route
        $form.post(route('activities.store'));
    }

    // Helper to toggle tags in the form array
    function toggleTag(tagId: number, checked: boolean) {
        if (checked) {
            $form.tags = [...$form.tags, tagId];
        } else {
            $form.tags = $form.tags.filter(id => id !== tagId);
        }
    }
</script>

<div class="flex min-h-screen items-center justify-center bg-gray-50 p-4">
    <Card.Root class="w-full max-w-lg">
        <Card.Header>
            <Card.Title class="text-2xl">Create New Event</Card.Title>
            <Card.Description>Fill in the details to host a new activity.</Card.Description>
        </Card.Header>

        <form onsubmit={(e) => { e.preventDefault(); submit(); }}>
            <Card.Content class="space-y-4">
                
                <div class="space-y-2">
                    <Label for="title">Event Title</Label>
                    <Input id="title" type="text" placeholder="e.g. Gym Session" bind:value={$form.title} />
                    {#if $form.errors.title}
                        <p class="text-sm text-red-500">{$form.errors.title}</p>
                    {/if}
                </div>

                <div class="space-y-2">
                    <Label for="description">Description</Label>
                    <Textarea id="description" placeholder="What are we doing?" bind:value={$form.description} />
                    {#if $form.errors.description}
                        <p class="text-sm text-red-500">{$form.errors.description}</p>
                    {/if}
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <Label for="date">When?</Label>
                        <Input id="date" type="datetime-local" bind:value={$form.date} />
                        {#if $form.errors.date}
                            <p class="text-sm text-red-500">{$form.errors.date}</p>
                        {/if}
                    </div>

                    <div class="space-y-2">
                        <Label for="people">Max People</Label>
                        <Input id="people" type="number" min="2" bind:value={$form.max_people} />
                        {#if $form.errors.max_people}
                            <p class="text-sm text-red-500">{$form.errors.max_people}</p>
                        {/if}
                    </div>
                </div>

                <div class="space-y-2 pt-2">
                    <Label>Select Tags</Label>
                    <div class="grid grid-cols-2 gap-2 rounded-md border p-4 sm:grid-cols-3">
                        {#each allTags as tag}
                            <div class="flex items-center space-x-2">
                                <Checkbox 
                                    id="tag-{tag.id}" 
                                    onCheckedChange={(v) => toggleTag(tag.id, v as boolean)}
                                />
                                <Label for="tag-{tag.id}" class="cursor-pointer font-normal">{tag.name}</Label>
                            </div>
                        {/each}
                    </div>
                </div>

            </Card.Content>

            <Card.Footer class="flex justify-between">
                <Button variant="ghost" href={route('home')}>Cancel</Button>
                
                <Button type="submit" disabled={$form.processing}>
                    {#if $form.processing}
                        <LoaderCircle class="mr-2 h-4 w-4 animate-spin" />
                    {/if}
                    Create Event
                </Button>
            </Card.Footer>
        </form>
    </Card.Root>
</div>