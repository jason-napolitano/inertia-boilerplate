export function useNumber() {
  /** --------------------------------------------
   * Parses a number value and returns the corresponding
   * comma-delineated string value
   *
   * @param number {number} The value to parse
   *
   * @returns {string}
   */
  function thousandth(number: number | string): string {
    const num_parts = number.toString().split('.')
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',')
    return num_parts.join('.')
  }

  /** --------------------------------------------
   * Returns a currency friendly number
   *
   * @param number {number}
   *
   * @returns {string}
   */
  function currency(number: number): string {
    return number.toLocaleString('en', { minimumFractionDigits: 2 })
  }

  /** --------------------------------------------
   * Returns a currency friendly number
   *
   * @param x {number}
   * @param y {number}
   * @param l {number}
   *
   * @returns {number}
   */
  const percentage = (x: number, y: number, l: number = 2): number =>
    parseFloat(((x / y) * 100).toFixed(l))

  /**
   * Greater-than wrapper
   *
   * @param x {number}
   * @param y {number}
   *
   * @returns {boolean}
   */
  const gt = (x: number, y: number): boolean => x > y

  /**
   * Less-than wrapper
   *
   * @param x {number}
   * @param y {number}
   *
   * @returns {boolean}
   */
  const lt = (x: number, y: number): boolean => x < y

  return { thousandth, percentage, currency, gt, lt }
}
