import React from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { Head } from '@inertiajs/inertia-react'
import Button from '@/Components/Button'
import { Link, useForm } from '@inertiajs/inertia-react'

export default function Dashboard(props) {
  const { delete: destroy } = useForm()

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
          グループ一覧
        </h2>
      }
    >
      <Head title="グループ一覧" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6 bg-white border-b border-gray-200">
              <div>
                <Link href={route('group.create')}>
                  <Button type="button">新規グループを作成</Button>
                </Link>
                <Link href={route('images.index')}>
                  <Button type="button">画像ライブラリ</Button>
                </Link>
              </div>
              <ul>
                {props.groups.map((group) => {
                  return (
                    <li key={group.group_id}>
                      {group.name}
                      {group.thumbnail && (
                        <img src={`../uploads/group/${group.thumbnail}`} />
                      )}
                      <Link href={route('group.edit', group.group_id)}>
                        <button className="px-4 py-2 bg-green-500 text-white rounded-lg text-xs font-semibold">
                          更新
                        </button>
                      </Link>
                      <button
                        className="px-4 py-2 bg-red-500 text-white rounded-lg text-xs font-semibold"
                        onClick={() =>
                          destroy(route('group.destroy', group.group_id), {
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
