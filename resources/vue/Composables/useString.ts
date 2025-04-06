/**
 * A set of composable functions that aid in the manipulation
 * of strings.
 *
 * @author  Jason Napolitano
 * @version 1.9.1
 * @since   1.0.0
 */
export function useString() {
  /** --------------------------------------------
   * Truncate a string and add an ellipsis to the
   * end of it
   *
   * @param input {string}
   * @param n {number}
   * @param end {string}
   *
   * @returns {string}
   */
  function truncate(
    input: string,
    n: number = 55,
    end: string = '...'
  ): string {
    return input.length > 5 ? input.substring(0, n) + end : input
  }

  /** --------------------------------------------
   * Removes hyphens (EG: '-' )  from a string
   *
   * @param phrase {string}
   *
   * @returns {string}
   */
  function removeHyphens(phrase: string): string {
    return phrase.replace(/-/g, ' ')
  }

  /** --------------------------------------------
   * Removes hyphens (EG: '-' )  from a string
   *
   * @param phrase {string}
   *
   * @returns {string}
   */
  function removeUnderscores(phrase: string): string {
    return phrase.replace(/_/g, ' ')
  }

  /** --------------------------------------------
   * Converts the first letter of each word in
   * a multi-word string to uppercase
   *
   * @param phrase {string}
   *
   * @returns {string}
   */
  function toTitleCase(phrase: string): string {
    return phrase
      .toLowerCase()
      .split(' ')
      .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
      .join(' ')
  }

  /** --------------------------------------------
   * Capitalize the first letter in a string
   *
   * @link https://www.php.net/manual/en/function.ucfirst.php
   *
   * @param string {string}
   *
   * @returns {string}
   */
  function ucFirst(string: string): string {
    return string.charAt(0).toUpperCase() + string.slice(1)
  }

  /** --------------------------------------------
   * Creates a slug formatted string
   *
   * @param str {string}
   *
   * @return {string}
   */
  function slug(str: string): string {
    return str
      .trim()
      .toLowerCase()
      .replace(/[\W_]+/g, '-')
      .replace(/^-+|-+$/g, '')
  }

  /** --------------------------------------------
   * Removes a trailing comma from a string
   *
   * @param value {string}
   *
   * @returns {string}
   */
  function removeTrailingComma(value: string): string {
    return value.replace(/, \s*$/, '').replace(/,\s*$/, '')
  }

  // -------------------------------------------
  // singular and plural
  const irregular: { [key: string]: string } = {
    move: 'moves',
    foot: 'feet',
    goose: 'geese',
    sex: 'sexes',
    child: 'children',
    man: 'men',
    tooth: 'teeth',
    person: 'people',
  }
  const uncountable: string[] = [
    'sheep',
    'fish',
    'deer',
    'moose',
    'series',
    'species',
    'money',
    'rice',
    'information',
    'equipment',
    'bison',
    'cod',
    'offspring',
    'pike',
    'salmon',
    'shrimp',
    'swine',
    'trout',
    'aircraft',
    'hovercraft',
    'spacecraft',
    'sugar',
    'tuna',
    'you',
    'wood',
  ]

  /** --------------------------------------------
   * Returns the plural of an English word.
   *
   * @export
   * @param {string} word
   * @param {number} amount
   *
   * @returns {string}
   */
  function plural(word: string, amount?: number): string {
    if (amount !== undefined && amount === 1) {
      return word
    }
    const plural: { [key: string]: string } = {
      '(quiz)$': '$1zes',
      '^(ox)$': '$1en',
      '([m|l])ouse$': '$1ice',
      '(matr|vert|ind)ix|ex$': '$1ices',
      '(x|ch|ss|sh)$': '$1es',
      '([^aeiouy]|qu)y$': '$1ies',
      '(hive)$': '$1s',
      '(?:([^f])fe|([lr])f)$': '$1$2ves',
      '(shea|lea|loa|thie)f$': '$1ves',
      sis$: 'ses',
      '([ti])um$': '$1a',
      '(tomat|potat|ech|her|vet)o$': '$1oes',
      '(bu)s$': '$1ses',
      '(alias)$': '$1es',
      '(octop)us$': '$1i',
      '(ax|test)is$': '$1es',
      '(us)$': '$1es',
      '([^s]+)$': '$1s',
    }
    // save some time in the case that singular and plural are the same
    if (uncountable.indexOf(word.toLowerCase()) >= 0) {
      return word
    }
    // check for irregular forms
    for (const w in irregular) {
      const pattern = new RegExp(`${w}$`, 'i')
      const replace = irregular[w]
      if (pattern.test(word)) {
        return word.replace(pattern, replace)
      }
    }
    // check for matches using regular expressions
    for (const reg in plural) {
      const pattern = new RegExp(reg, 'i')
      if (pattern.test(word)) {
        return word.replace(pattern, plural[reg])
      }
    }
    return word
  }

  /** --------------------------------------------
   * Returns the singular of an English word.
   *
   * @export
   * @param {string} word
   * @param {number} amount
   *
   * @returns {string}
   */
  function singular(word: string, amount?: number): string {
    if (amount !== undefined && amount !== 1) {
      return word
    }
    const singular: { [key: string]: string } = {
      '(quiz)zes$': '$1',
      '(matr)ices$': '$1ix',
      '(vert|ind)ices$': '$1ex',
      '^(ox)en$': '$1',
      '(alias)es$': '$1',
      '(octop|vir)i$': '$1us',
      '(cris|ax|test)es$': '$1is',
      '(shoe)s$': '$1',
      '(o)es$': '$1',
      '(bus)es$': '$1',
      '([m|l])ice$': '$1ouse',
      '(x|ch|ss|sh)es$': '$1',
      '(m)ovies$': '$1ovie',
      '(s)eries$': '$1eries',
      '([^aeiouy]|qu)ies$': '$1y',
      '([lr])ves$': '$1f',
      '(tive)s$': '$1',
      '(hive)s$': '$1',
      '(li|wi|kni)ves$': '$1fe',
      '(shea|loa|lea|thie)ves$': '$1f',
      '(^analy)ses$': '$1sis',
      '((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$':
        '$1$2sis',
      '([ti])a$': '$1um',
      '(n)ews$': '$1ews',
      '(h|bl)ouses$': '$1ouse',
      '(corpse)s$': '$1',
      '(us)es$': '$1',
      s$: '',
    }
    // save some time in the case that singular and plural are the same
    if (uncountable.indexOf(word.toLowerCase()) >= 0) {
      return word
    }
    // check for irregular forms
    for (const w in irregular) {
      const pattern = new RegExp(`${irregular[w]}$`, 'i')
      if (pattern.test(word)) {
        return word.replace(pattern, w)
      }
    }
    // check for matches using regular expressions
    for (const reg in singular) {
      const pattern = new RegExp(reg, 'i')
      if (pattern.test(word)) {
        return word.replace(pattern, singular[reg])
      }
    }
    return word
  }

  /** --------------------------------------------
   * Converts a phone number into a human-readable string
   *
   * @param {string} phone
   *
   * @returns {string}
   */
  function phoneNumber(phone: string): string | null {
    const cleaned = ('' + phone).replace(/\D/g, '')
    const match = cleaned.match(/^(1|)?(\d{3})(\d{3})(\d{4})$/)
    if (match) {
      let intlCode = match[1] ? '+1 ' : ''
      return [intlCode, '(', match[2], ') ', match[3], '-', match[4]].join('')
    }
    return null
  }

  /** --------------------------------------------
   * Get the initials of a name passed through as a string
   *
   * @param {string} name
   *
   * @returns {string}
   */
  function initials(name: string): string {
    return name
      .split(/\s+/)
      .map((word: string) => word.charAt(0))
      .join('')
  }

  return {
    removeTrailingComma,
    removeUnderscores,
    removeHyphens,
    phoneNumber,
    toTitleCase,
    initials,
    truncate,
    singular,
    ucFirst,
    plural,
    slug,
  }
}
