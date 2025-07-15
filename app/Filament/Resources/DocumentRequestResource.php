<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentRequestResource\Pages;
use App\Filament\Resources\DocumentRequestResource\RelationManagers;
use App\Models\DocumentRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\Select;

class DocumentRequestResource extends Resource
{
    protected static ?string $model = DocumentRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Student'),
                TextColumn::make('document_type')->sortable()->searchable(),
                BadgeColumn::make('status')
                    ->colors([
                        'secondary' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),
                TextColumn::make('created_at')->label('Requested At')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocumentRequests::route('/'),
            'create' => Pages\CreateDocumentRequest::route('/create'),
            'edit' => Pages\EditDocumentRequest::route('/{record}/edit'),
        ];
    }
}
