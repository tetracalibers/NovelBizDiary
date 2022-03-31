import React, { useEffect } from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { Head, useForm } from '@inertiajs/inertia-react'
import Input from '@/Components/Input'
import Label from '@/Components/Label'
import Button from '@/Components/Button'
import ValidationErrors from '@/Components/ValidationErrors'

export default function Create(props) {
  const { data, setData, patch, processing, errors, progress } = useForm({
    name: props.group.name,
    thumbnail: new File([''], props.group.thumbnail),
  })

  useEffect(() => {
    fetch(`../../uploads/group/${props.group.thumbnail}`)
      .then((response) => response.blob())
      .then((blob) => new File([blob], props.group.thumbnail))
      .then((file) => setData('thumbnail', file))
  }, [])

  const submit = (e) => {
    e.preventDefault()
    patch(route('group.update', props.group.group_id))
  }

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
          グループ定義を変更
        </h2>
      }
    >
      <Head title="グループ定義を変更" />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6 bg-white border-b border-gray-200">
              <ValidationErrors errors={errors} />
              <form onSubmit={submit}>
                <div>
                  <Label forInput="name" value="Name" />
                  <Input
                    type="text"
                    name="name"
                    value={data.name}
                    className="mt-1 block w-full"
                    isFocused={true}
                    handleChange={(e) => setData('name', e.target.value)}
                  />
                </div>
                <div>
                  <input
                    type="file"
                    onChange={(e) => setData('thumbnail', e.target.files[0])}
                  />
                  {progress && (
                    <progress value={progress.percentage} max="100">
                      {progress.percentage}%
                    </progress>
                  )}
                  <div>
                    {data.thumbnail && (
                      <img src={`../../uploads/group/${data.thumbnail.name}`} />
                    )}
                  </div>
                </div>
                <div className="flex items-center justify-end mt-4">
                  <Button className="ml-4" processing={processing}>
                    更新
                  </Button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}
