<template>
  <Link :href="route('logout')" method="post" as="button">
    <slot> Logout </slot>
  </Link>
</template>
