import { Book, House } from 'lucide-vue-next'
import { SidebarParentItem } from '@/Types'

export function useSidebar() {
  // an array of sidebar items
  const sidebarItems: SidebarParentItem[] = [
    {
      title: 'Frontend Links',
      icon: Book,
      children: [
        {
          title: 'Homepage',
          route: 'home',
        },
      ],
    },
  ]

  return { sidebarItems }
}
