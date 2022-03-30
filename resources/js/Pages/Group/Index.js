import React from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { Head } from '@inertiajs/inertia-react'
import Button from '@/Components/Button'
import { Link } from '@inertiajs/inertia-react'

export default function Dashboard(props) {
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
              </div>
              <ul>
                {props.groups.map((group) => {
                  return (
                    <li key={group.groupId}>
                      {group.name}
                      {group.thumbnail && (
                        <img src={`../uploads/group/${group.thumbnail}`} />
                      )}
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
