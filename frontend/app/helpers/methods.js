
export function getMessage(value) {
  return Array.isArray(value) ? value[0] : value
}
