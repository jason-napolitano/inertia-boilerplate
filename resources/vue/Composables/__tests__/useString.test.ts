import { expect, test, describe } from 'vitest'
import { useString } from '../useString'

// composable
const string = useString()

describe('string composables', () => {
  // ----------------------------------------------------
  test('returns pluralized version of a word', () => {
    expect(string.plural('stair')).toBe('stairs')
  })

  // ----------------------------------------------------
  test('returns a truncated version of a string', () => {
    const original = 'This is a trimmed string. We expect it to be different'
    expect(string.truncate(original, 35)).toBe(
      'This is a trimmed string. We expect...'
    )
  })

  // ----------------------------------------------------
  test('removes hyphens from a string', () => {
    const original = 'this-will-have-the-hyphens-removed'
    expect(string.removeHyphens(original)).toBe(
      'this will have the hyphens removed'
    )
  })

  // ----------------------------------------------------
  test('converts a string to title case', () => {
    const original = 'This string will be title cased'
    expect(string.toTitleCase(original)).toBe('This String Will Be Title Cased')
  })

  // ----------------------------------------------------
  test('capitalizes the first word in a string', () => {
    expect(string.ucFirst('world')).toBe('World')
  })

  // ----------------------------------------------------
  test('converts a string to a slug', () => {
    const original = 'This string will be slugged'
    expect(string.slug(original)).toBe('this-string-will-be-slugged')
  })

  // ----------------------------------------------------
  test('returns a pluralized version of a word', () => {
    expect(string.plural('stair')).toBe('stairs')
  })

  // ----------------------------------------------------
  test('returns a singular version of a word', () => {
    expect(string.singular('stairs')).toBe('stair')
  })

  // ----------------------------------------------------
  test('returns a human-readable phone number', () => {
    const phone = '800-555-1234'
    expect(string.phoneNumber(phone)).toBe('(800) 555-1234')
  })

  // ----------------------------------------------------
  test('returns initials for two words in a string', () => {
    expect(string.initials('Hello World')).toBe('HW')
  })
})
