import React from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { Head, useForm } from '@inertiajs/inertia-react'
import Button from '@/Components/Button'
import ValidationErrors from '@/Components/ValidationErrors'

export default function Dashboard(props) {
  const {
    delete: destroy,
    setData,
    post,
    processing,
    errors,
    progress,
    data,
  } = useForm({
    image: '',
    preview: '',
  })

  const resetData = () => {
    setData('preview', '')
    setData('image', '')
  }

  const uploadSubmit = (e) => {
    e.preventDefault()
    post(route('images.store'))
    resetData()
  }

  const previewFile = (e) => {
    const file = e.target.files[0]

    const reader = new FileReader()
    reader.addEventListener(
      'load',
      function () {
        setData('preview', reader.result)
        setData('image', file)
      },
      false
    )

    if (file) {
      reader.readAsDataURL(file)
    }
  }

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
          画像ライブラリ
        </h2>
      }
    >
      <Head title="画像ライブラリ" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6 bg-white border-b border-gray-200">
              <ValidationErrors errors={errors} />
              <form onSubmit={uploadSubmit}>
                <input type="file" onChange={(e) => previewFile(e)} />
                {progress && (
                  <progress value={progress.percentage} max="100">
                    {progress.percentage}%
                  </progress>
                )}
                {data.preview && (
                  <img src={data.preview} width="100" height="100" />
                )}
                <Button className="ml-4" processing={processing}>
                  アップロード
                </Button>
              </form>
              <ul>
                {props.images.map((image) => {
                  return (
                    <li key={image.image_id}>
                      <img src={`../uploads/${image.path}`} />
                      <button
                        className="px-4 py-2 bg-red-500 text-white rounded-lg text-xs font-semibold"
                        onClick={() =>
                          destroy(route('images.destroy', image.image_id), {
                            preserveScroll: true,
                          })
                        }
                      >
                        削除
                      </button>
                    </li>
                  )
                })}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}
