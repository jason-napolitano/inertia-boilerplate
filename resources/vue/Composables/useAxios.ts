import axios from 'axios'

export const useAxios = () => {
  const request = axios.create({
    headers: {
      'Content-Type': 'multipart/form-data',
      // @ts-expect-error expected error
      'X-CSRF-TOKEN': document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content'),
    },
  })

  return { request }
}
