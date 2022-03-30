import React from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { Head, useForm } from '@inertiajs/inertia-react'
import Input from '@/Components/Input'
import Label from '@/Components/Label'
import Button from '@/Components/Button'
import ValidationErrors from '@/Components/ValidationErrors'

export default function Create(props) {
  const { data, setData, post, processing, errors } = useForm({
    name: '',
  })

  const onHandleChange = (event) => {
    setData(event.target.name, event.target.value)
  }

  const submit = (e) => {
    e.preventDefault()

    post(route('blog.store'))
  }

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
          新規グループを作成
        </h2>
      }
    >
      <Head title="新規グループを作成" />
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
                    value={data.title}
                    className="mt-1 block w-full"
                    isFocused={true}
                    handleChange={onHandleChange}
                  />
                </div>
                <div className="flex items-center justify-end mt-4">
                  <Button className="ml-4" processing={processing}>
                    作成
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
