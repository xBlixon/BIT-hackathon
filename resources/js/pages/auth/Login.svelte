<script lang="ts">
 import * as Field from "@/components/ui/field/";
 import { Input } from "@/components/ui/input/";
 import { Button } from "@/components/ui/button";
 import { Form } from "@inertiajs/svelte";
 import AuthBase from "@/layouts/AuthLayout.svelte"; 
</script>

<svelte:head>
    <title>Log in</title>
</svelte:head>

<AuthBase title="Log in" description="Enter your credentials to access your account">
  

  <Form method="POST" action="/login" class="space-y-6">
   {#snippet children({ processing, errors }: { processing: boolean; errors: Record<string, string> })}
     <Field.Set>
      <Field.Group>
       
       <Field.Field>
        <Field.Label for="username">Username</Field.Label>
        <Input 
            id="username" 
            name="username" 
            type="text" 
            placeholder="username" 
            required 
            disabled={processing}
        />
        <Field.Description>Enter a unique username</Field.Description>
        {#if errors.username}
            <p class="text-[0.8rem] font-medium text-destructive">{errors.username}</p>
        {/if}
       </Field.Field>

       <Field.Field>
        <Field.Label for="password">Password</Field.Label>
        <Input 
            id="password" 
            name="password" 
            type="password" 
            placeholder="password" 
            required 
            disabled={processing} 
        />
        
        {#if errors.password}
            <p class="text-[0.8rem] font-medium text-destructive">{errors.password}</p>
        {:else}
            <Field.Description>Must be at least 8 characters long.</Field.Description>
        {/if}
       </Field.Field>

       <Button type="submit" class="w-full" disabled={processing}>
            {#if processing} Logging in... {:else} Log in {/if}
       </Button>
      
      </Field.Group>
     </Field.Set>

    <div class="mt-4 text-center text-sm text-gray-400">
     Not a user yet?
     <a href="/register" class="underline underline-offset-4 hover:text-primary">
      Sign up now
     </a>.
    </div>
   {/snippet}
  </Form>
</AuthBase>