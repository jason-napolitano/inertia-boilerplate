import { useString } from '../useString'
import { expect, test } from 'vitest'

// composable
const string = useString()

// variables
let original: string = 'stair'
let modified: string = 'stairs'

// tests
test('returns pluralized version of a word', () => {
  original = 'stair'
  modified = 'stairs'
  expect(string.plural(original)).toBe(modified)
})
