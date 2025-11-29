<script lang="ts">
 import * as Field from "@/components/ui/field/";
 import {Input} from "@/components/ui/input/";
</script>
<p class="flex justify-center">tu kiedys bedzie logo</p>
<div class="flex h-screen w-full items-center justify-center p-4">

    <div class="w-full max-w-md">
        <Field.Set>
            <Field.Group>
   <Field.Field>
    <Field.Label for="username">Username</Field.Label>
    <Input id="username" type="text" placeholder="username" />
    <Field.Description
     >Choose a unique username for your account.</Field.Description
    >
   </Field.Field>
   <Field.Field>
    <Field.Label for="password">Password</Field.Label>
    <Input id="password" type="password" placeholder="password" />
    <Field.Description
     >Must be at least 8 characters long.</Field.Description
    >
   </Field.Field>
  </Field.Group>
  <p>Not a user yet?
  <a href="/register" class="underline hover:text-gray-400"> Sign up </a>
    now</p>
 </Field.Set>
</div>
</div>