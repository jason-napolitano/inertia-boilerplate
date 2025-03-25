export interface DatabaseRecord {
  deleted_at?: string
  created_at: string
  updated_at: string
  id: string
}

export interface User extends DatabaseRecord {
  email_verified_at?: string
  state_province: string
  roles: RoleInterface[]
  profile_image: string
  salary_type: string
  country: string
  address: string
  salary: number
  phone: string
  email: string
  name: string
}

export interface PaginatedResults {
  data: DatabaseRecord[]
  links: object[]
}

interface RoleInterface {
  name: string
}

export type PageProps<
  T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
  flash: {
    message: string
    type: string
  }
  auth: {
    permissions: object[]
    user: User
  }
}
