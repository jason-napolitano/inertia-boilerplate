export interface DatabaseRecord {
  deleted_at?: string
  created_at: string
  updated_at: string
  id: string
}

export interface RoleInterface {
  name: string
}

export interface PermissionInterface {
  name: string
}

export interface User extends DatabaseRecord {
  permissions: PermissionInterface[]
  email_verified_at?: string
  roles: RoleInterface[]
  profile_image: string
  country: string
  address: string
  phone: string
  email: string
  name: string
}

export interface PaginationLink {
  active: boolean
  label: string
  url: string
}

export interface PaginatedResults {
  data: DatabaseRecord[]
  links: PaginationLink[]
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>, > = T & {
  flash: {
    message: string
    type: string
  }
  auth: {
    permissions: object[]
    user: User
  }
}

export type SidebarItem = {
    title?: string | null
    route?: string | null
    icon?: object | null
    children?: SidebarItem[] | null
}
