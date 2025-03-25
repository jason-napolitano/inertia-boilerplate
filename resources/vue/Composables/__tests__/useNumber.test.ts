import { expect, test, describe } from 'vitest'
import { useNumber } from '../useNumber'

// composables
const number = useNumber()

describe('number composables', () => {
  // ----------------------------------------------------
  test('converts a number to a thousandth string', function () {
    expect(number.thousandth(1000)).toBe('1,000')
  })

  // ----------------------------------------------------
  test('converts a number to a currency string', function () {
    expect(number.currency(100.25)).toBe('100.25')
  })

  // ----------------------------------------------------
  test('converts a number to a percentage', function () {
    expect(number.percentage(250, 500)).toBe(50.0)
  })

  // ----------------------------------------------------
  test('evaluates if x is greater than y', function () {
    expect(number.gt(10, 1)).toBeTruthy()
  })

  // ----------------------------------------------------
  test('evaluates if x is less than y', function () {
    expect(number.lt(1, 10)).toBeTruthy()
  })
})
