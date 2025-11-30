<script lang="ts">
    import { useForm } from '@inertiajs/svelte';
    import { Button } from '@/components/ui/button';
    import { Input } from '@/components/ui/input';
    import { Label } from '@/components/ui/label';
    import { Textarea } from '@/components/ui/textarea';
    import * as Card from '@/components/ui/card';
    import { LoaderCircle } from 'lucide-svelte';
    import TagsDropdown from '@/components/TagsDropdown.svelte';

    let { tags } = $props();

    const form = useForm({
        title: '',
        description: '',
        location: '',
        tags: [] as number[],
    });
    function submit() {
        $form.post(route('event.store'));
    }

    function toggleTag(tagId: number, checked: boolean) {
        if (checked) {
            $form.tags = [...$form.tags, tagId];
        } else {
            $form.tags = $form.tags.filter((id) => id !== tagId);
        }
    }
</script>

<div class="flex min-h-screen items-center justify-center bg-gray-50 p-4">
    <Card.Root class="w-full max-w-lg">
        <Card.Header>
            <Card.Title class="text-2xl">Create New Event</Card.Title>
            <Card.Description>Fill in the details to host a new activity.</Card.Description>
        </Card.Header>

        <form
            onsubmit={(e) => {
                e.preventDefault();
                submit();
            }}
        >
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
                        <Label for="location">Where?</Label>
                        <Input id="location" type="text" bind:value={$form.location} />
                        {#if $form.errors.location}
                            <p class="text-sm text-red-500">{$form.errors.location}</p>
                        {/if}
                    </div>
                </div>

                <div class="space-y-2 pt-2">
                    <Label>Select Tags</Label>
                    <TagsDropdown allTags={tags}></TagsDropdown>
                </div>
            </Card.Content>

            <Card.Footer class="flex justify-between">
                <Button variant="ghost" href={route('home')}>Cancel</Button>

                <Button type="submit"   >
                    {#if $form.processing}
                        <LoaderCircle class="mr-2 h-4 w-4 animate-spin" />
                    {/if}
                    Create Event
                </Button>
            </Card.Footer>
        </form>
    </Card.Root>
</div>
